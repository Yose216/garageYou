<?php

namespace garage\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use	garage\Domain\User;
use garage\Form\Type\UserType2;

class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        $voitures = $app['dao.voiture']->findAll();
        return $app['twig']->render('index.html.twig', array(
            'voitures' => $voitures));
    }


    /**
     * Article details controller.
     *
     * @param integer $id Article id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
//     public function articleAction($id, Request $request, Application $app) {
//         $article = $app['dao.article']->find($id);
//		 $articles = $app['dao.article']->findAll();
//         $commentFormView = null;
//         if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
//             A user is fully authenticated : he can add comments
//             $comment = new Comment();
//             $comment->setArticle($article);
//             $user = $app['user'];
//             $comment->setAuthor($user);
//             $commentForm = $app['form.factory']->create(new CommentType(), $comment);
//             $commentForm->handleRequest($request);
//             if ($commentForm->isSubmitted() && $commentForm->isValid()) {
//                 $app['dao.comment']->save($comment);
//                 $app['session']->getFlashBag()->add('success', 'Your comment was succesfully added.');
//             }
//             $commentFormView = $commentForm->createView();
//         }
//         $comments = $app['dao.comment']->findAllByArticle($id);
//         return $app['twig']->render('article.html.twig', array(
//			 'articles' => $articles,
//             'article' => $article,
//             'comments' => $comments,
//             'commentForm' => $commentFormView));
//     }

    /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
    }
	
}