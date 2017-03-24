<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 22/03/17
 * Time: 22:39
 */

namespace Barathon\barBundle\Form;



use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BarSearchType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('ville',      TextType::class)
            ->add('category',    EntityType::class, array(
                'class' => 'Barathon\barBundle\Entity\Category',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'label' => 'Catégories'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Barathon\barBundle\Entity\Bar',
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'barathon_barbundle_bar';
    }

}