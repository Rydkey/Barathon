<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 14/01/17
 * Time: 17:39
 */

namespace Barathon\utilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pays')->add('ville')->add('age')->add('nom')->add('prenom');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

//    For Symfony 2.x
//    public function getName()
//    {
//        return $this->getBlockPrefix();
//    }
}