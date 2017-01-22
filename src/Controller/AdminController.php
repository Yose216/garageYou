<?php

namespace garage\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use garage\Domain\Voiture;
use garage\Domain\User;
use garage\Form\Type\VoitureType;
use garage\Form\Type\UserType;

class AdminController {

    /**
     * Admin home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        // $articles = $app['dao.article']->findAll();
        // $comments = $app['dao.comment']->findAll();
        $users = $app['dao.user']->findAll();
        return $app['twig']->render('admin.html.twig', array(
            // 'articles' => $articles,
            // 'comments' => $comments,
            'users' => $users));
    }

    /**
     * Add voiture controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
     public function addVoitureAction(Request $request, Application $app) {
         $voiture = new Voiture();
         $voitureForm = $app['form.factory']->create(new VoitureType(), $voiture);
         $voitureForm->handleRequest($request);
		 if ($request->isMethod('POST')) {
			 if ($voitureForm->isValid()) {
				 //$image = $request->files->get($articleForm->getName());
				 /* Make sure that Upload Directory is properly configured and writable */
//				 $path = __DIR__.'/../../web/images/Articles/';
//				 $filename = $image['image']->getClientOriginalName();
//				 $image['image']->move($path,$filename);
//				 $article->setImage($filename);

				 $message = 'File was successfully uploaded!';
				
//				$app['monolog']->addError(get_class($article->getDateArt()));
			 }
    	 }
         if ($voitureForm->isSubmitted() && $voitureForm->isValid()) {
             $app['dao.voiture']->save($voiture);
             $app['session']->getFlashBag()->add('success', 'The voiture was successfully created.');
         }
         return $app['twig']->render('voiture_form.html.twig', array(
             'title' => 'New voiture',
             'voitureForm' => $voitureForm->createView()));
     }

    /**
     * Edit voiture controller.
     *
     * @param integer $id voiture id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
     public function editVoitureAction($id, Request $request, Application $app) {
         $voiture = $app['dao.voiture']->find($id);
		// $app['monolog']->addError(var_dump($article->getDateArt()));
         $voitureForm = $app['form.factory']->create(new VoitureType(), $voiture);
         $voitureForm->handleRequest($request);
		 if ($request->isMethod('POST')) {
			 if ($voitureForm->isValid()) {
				// $files = $request->files->get($articleForm->getName());
				/* Make sure that Upload Directory is properly configured and writable */
				// $path = __DIR__.'/../../web/images/Articles/';
				// $filename = $files['image']->getClientOriginalName();
				// $files['image']->move($path,$filename);
				// $article->setImage($filename);
				 $message = 'File was successfully uploaded!';
			 }
    	 }
         if ($voitureForm->isSubmitted() && $voitureForm->isValid()) {
             $app['dao.voiture']->save($voiture);
             $app['session']->getFlashBag()->add('success', 'The voiture was succesfully updated.');
         }
         return $app['twig']->render('voiture_form.html.twig', array(
             'title' => 'Edit voiture',
             'voitureForm' => $voitureForm->createView()));	
    }

    /**
     * Delete voiture controller.
     *
     * @param integer $id voiture id
     * @param Application $app Silex application
     */
     public function deleteVoitureAction($id, Application $app) {
//         Delete the voiture
         $app['dao.voiture']->delete($id);
         $app['session']->getFlashBag()->add('success', 'The voiture was succesfully removed.');
//         Redirect to admin home page
         return $app->redirect($app['url_generator']->generate('admin'));
     }

    /**
     * Edit comment controller.
     *
     * @param integer $id Comment id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    // public function editCommentAction($id, Request $request, Application $app) {
        // $comment = $app['dao.comment']->find($id);
        // $commentForm = $app['form.factory']->create(new CommentType(), $comment);
        // $commentForm->handleRequest($request);
        // if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            // $app['dao.comment']->save($comment);
            // $app['session']->getFlashBag()->add('success', 'The comment was succesfully updated.');
        // }
        // return $app['twig']->render('comment_form.html.twig', array(
            // 'title' => 'Edit comment',
            // 'commentForm' => $commentForm->createView()));
    // }

    /**
     * Delete comment controller.
     *
     * @param integer $id Comment id
     * @param Application $app Silex application
     */
    // public function deleteCommentAction($id, Application $app) {
        // $app['dao.comment']->delete($id);
        // $app['session']->getFlashBag()->add('success', 'The comment was succesfully removed.');
        // Redirect to admin home page
        // return $app->redirect($app['url_generator']->generate('admin'));
    // }

    /**
     * Add user controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function addUserAction(Request $request, Application $app) {
        $user = new User();
        $userForm = $app['form.factory']->create(new UserType(), $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // generate a random salt value
            $salt = substr(md5(time()), 0, 23);
            $user->setSalt($salt);
            $plainPassword = $user->getPassword();
            // find the default encoder
            $encoder = $app['security.encoder.digest'];
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);
            $app['session']->getFlashBag()->add('success', 'The user was successfully created.');
        }
        return $app['twig']->render('user_form.html.twig', array(
            'title' => 'New user',
            'userForm' => $userForm->createView()));
    }

    /**
     * Edit user controller.
     *
     * @param integer $id User id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function editUserAction($id, Request $request, Application $app) {
        $user = $app['dao.user']->find($id);
        $userForm = $app['form.factory']->create(new UserType(), $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $plainPassword = $user->getPassword();
            // find the encoder for the user
            $encoder = $app['security.encoder_factory']->getEncoder($user);
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);
            $app['session']->getFlashBag()->add('success', 'The user was succesfully updated.');
        }
        return $app['twig']->render('user_form.html.twig', array(
            'title' => 'Edit user',
            'userForm' => $userForm->createView()));
    }

    /**
     * Delete user controller.
     *
     * @param integer $id User id
     * @param Application $app Silex application
     */
    public function deleteUserAction($id, Application $app) {
        // Delete the user
        $app['dao.user']->delete($id);
        $app['session']->getFlashBag()->add('success', 'The user was succesfully removed.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }
	
	
}
