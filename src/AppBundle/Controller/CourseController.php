<?php

namespace AppBundle\Controller;

use AppBundle\Controller\MainController;
use AppBundle\Entity\Course;
use AppBundle\Entity\CourseLike;
use AppBundle\Entity\CourseCategory;
use AppBundle\Entity\CourseTag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends MainController
{
    public function myCoursesAction(Request $request, $skill_id = 4)
    {
        $em = $this->getDoctrine()->getManager();
        $sorting = $request->query->get('sorting');
        if(!isset($sorting))
        {
            $sorting = 'date_dsc';
        }

        if($this->getUser())
        {
            $user_id = $this->getUser()->getId();
            $array = $em->getRepository('AppBundle:Course')->getByUser($user_id, $skill_id, $sorting);
            $courses = $this->paginator($array);
        }

        return $this->render('default/courses/my_courses.html.twig',
            array(
                'skill_id'=>$skill_id,
                'courses' => $courses,
                'sorting' => $sorting,
            )
        );
    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository("BeusoftCategoriesBundle:Category")->getActiveCategories();
        return $this->render('BeusoftCoursesBundle:Default:new.html.twig', array("categories" => $categories));
    }


    public function editAction(Request $request)
    {
        $id = $request->get("id");
        $em = $this->getDoctrine()->getEntityManager();
        $course = $em->getRepository("BeusoftCoursesBundle:Course")->find($id);
        $categories = $em->getRepository("BeusoftCategoriesBundle:Category")->getActiveCategories();
        return $this->render('BeusoftCoursesBundle:Default:new.html.twig', array("categories" => $categories, 'course' => $course));
    }


    public function createAction(Request $request)
    {
        $wistia_manager = $this->container->get('wistia_manager');
        $em = $this->getDoctrine()->getEntityManager();
        $tags_repo = $em->getRepository("BeusoftTagsBundle:Tag");
        $category_repo = $em->getRepository("BeusoftCategoriesBundle:Category");
        $file_repo = $em->getRepository("BeusoftMediaBundle:Media");
        $course_repo = $em->getRepository("BeusoftCoursesBundle:Course");

        $user = $this->getUser();


        $title = $request->get("title");
        $short_description = $request->get("short_description");
        $price = $request->get("price");
        $skill_level = $request->get("skill_level");
        $categories = $request->get("categories");
        $tags = $request->get("tags");

        $wistia_data = $wistia_manager->createProject($title);
        $hashed_id = $wistia_data->hashedId;

        $course_ref_file_id = $request->get("ref_file");
        $course_img_id = $request->get("img_file");
        $course_id = $request->get("course_id");
        $edit = 0;
        if ($course_id != 0) {
            $edit = 1;
            $new_course = $course_repo->find($course_id);
        } else {
            $new_course = new Course();
            $new_course->setCreator($user);
            $new_course->setCreatedAt(new \DateTime());

        }


        if ($course_ref_file_id != 0) {
            $file = $file_repo->find($course_ref_file_id);
            $new_course->setReferenceFilesMedia($file);
        }

        if ($course_img_id != 0) {
            $img = $file_repo->find($course_img_id);
            $new_course->setCoverMedia($img);
        }


        $new_course->setUser($user);
        $new_course->setSkillId($skill_level);
        $new_course->setTitle($title);
        $new_course->setHashedId($hashed_id);
        $new_course->setDescription($short_description);
        $new_course->setPrice($price);
        $new_course->setStatus(2);

        if ($price > 0)
            $new_course->setIsFree(0);
        else
            $new_course->setIsFree(1);

        $new_course->setUpdatedAt(new \DateTime());
        $em->persist($new_course);
        $em->flush();

        if ($course_id != 0) {
//            $course_tag_repo = $em->getRepository("BeusoftCoursesBundle:CourseTag");
//            $course_tags = $course_tag_repo->findBy(array("course" => $course_id));
//            foreach ($course_tags as $ct) {
//                $em->remove($ct);
//                $em->flush();
//            }
//
//            $course_cat_repo = $em->getRepository("BeusoftCoursesBundle:CourseCategory");
//            $course_cats = $course_cat_repo->findBy(array("course" => $course_id));
//            foreach ($course_cats as $ct) {
//                $em->remove($ct);
//                $em->flush();
//            }
//
        }


        $tags_array = explode(",", $tags);
        foreach ($tags_array as $tag) {
            $tag = $tags_repo->getTagObject(strtolower(trim($tag)), $user);
            if ($tag) {
                $course_tag = new CourseTag();
                $course_tag->setCourse($new_course);
                $course_tag->setTag($tag);
                $em->persist($course_tag);
                $em->flush();
                $new_course->addTag($course_tag);
            }

        }
        foreach ($categories as $category) {
            $cat_obj = $category_repo->find($category);
            if ($cat_obj) {
                $course_cat = new CourseCategory();
                $course_cat->setCourse($new_course);
                $course_cat->setCategory($cat_obj);
                $em->persist($course_cat);
                $em->flush();
                $new_course->addCategory($course_cat);
            }
        }
        $em->flush($new_course);
        return new Response(json_encode(array('edit'=>$edit,'status' => "Done", "id" => $new_course->getId(), "title" => $new_course->getTitle())), 200);
    }

    public function showAction(Request $request)
    {
        $liked = 0;
        $subscribed = 0;
        $id = $request->get("id");
        $em = $this->getDoctrine()->getEntityManager();
        $wistia_manager = $this->container->get('wistia_manager');

        if ($this->getUser()) {
            $user_id = $this->getUser()->getId();
            $course_likes_repo = $em->getRepository("BeusoftCoursesBundle:CourseLike");
            $subscription_repo = $em->getRepository("BeusoftSubscriptionsBundle:Subscription");
            $course_liked = $course_likes_repo->exists($id, $user_id);
            $isSubscribed = $subscription_repo->isSubscribed($id, $user_id);
        }

        $course_repo = $em->getRepository("BeusoftCoursesBundle:Course");
        $chapter_repo = $em->getRepository("BeusoftChaptersBundle:Chapter");
        $lesson_repo = $em->getRepository("BeusoftLessonsBundle:Lesson");


        $course = $course_repo->getCourseByID($id);
        $duration = $course_repo->getDuration($id);
        $duration = $duration['duration'];
        $chapters = $chapter_repo->getAllForCourse($id);
        if (isset($course_liked)) {
            $liked = 1;
        }
        if (isset($isSubscribed)) {
            $subscribed = 1;
        }
//        $wistia_data = $wistia_manager->getProject($course->getHashedId());
//        if (count($wistia_data->medias))
//        {
//            $media = $wistia_manager->getMedia($wistia_data->medias[0]->hashed_id);
//            var_dump($media);
//        }
//

        return $this->render('BeusoftCoursesBundle:Default:show.html.twig', array('course' => $course, 'courseLiked' => $liked, 'subscribed' => $subscribed, 'chapters' => $chapters, 'lesson_repo' => $lesson_repo, 'total_duration' => $duration));

    }

    public function likeCourseAction(Request $request)
    {
        $course_id = $request->get("course_id");
        $user = $this->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $course_repo = $em->getRepository("BeusoftCoursesBundle:Course");
        $course_like_repo = $em->getRepository("BeusoftCoursesBundle:CourseLike");
        $course_like = $course_like_repo->exists($course_id, $user->getId());

        if (isset($course_like)) {
            return new Response(json_encode(-1));
        } else {
            $course = $course_repo->findOneById($course_id);
            $course_like = new CourseLike();
            $course_like->setUser($user);
            $course_like->setCourse($course);
            $course_like->setCreatedAt(new \DateTime());

            $em->persist($course_like);
            $em->flush();

            $totalLikes = $course_like_repo->countLikes($course_id);
            $course->setTotalLikes($totalLikes[1]);

            $em->persist($course);
            $em->flush();

            return new Response(json_encode($totalLikes[1]));
        }
    }
    public function curlAction()
    {
        $wistia_manager = $this->get('wistia_manager');
        /* Live */
//        $data = $wistia_manager->uploadMediaByFile('uploads/gallery/551d2d1fefd55.flv');
        /* Local */
        $data = $wistia_manager->uploadMediaByFile('uploads/gallery/552cf433ec930.flv');
        return new Response(json_encode($data));
    }
}
