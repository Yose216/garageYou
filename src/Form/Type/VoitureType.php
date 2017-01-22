<?php

namespace garage\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\Form\Extension\Core\Type\DateType;

 class VoitureType extends AbstractType
 {
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
             ->add('model', 'text')
             ->add('marque', 'textarea')
			 ->add('annee', 'integer')
			 ->add('kilometrage','integer')
             ->add('carburant', 'choice', array(
                'choices' => array('Diesel' => 'Diesel' , 'Essence' => 'Essence' , 'Electrique' => 'Electrique')
            ))
             ->add('boiteVitesse', 'choice', array(
                'choices' => array('Automatique' => 'Automatique' , 'Manuelle' => 'Manuelle')
            ));
     }
     
     public function getName()
     {
         return 'article';
     }
 }
// ->add('image', 'file', array(
//                     'data_class' => null
//			 ))