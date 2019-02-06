<?php

namespace UserBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class UserType extends BaseType
{
    public function __construct($class = 'UserBundle\Form\UserType')
    {
        parent::__construct($class);
    }


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('type',ChoiceType::class,array(
                'choices'=>array(
                    'client'=>'client',
                    'agriculteur'=>'agriculteur'
                )

            ))
            ->add('telephone')
            //->add('plainPassword')
            ->add('dateNaissance', DateType::class, array(
                'required' => false,
                'widget' => 'single_text','html5'=> false,
            ));


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
            //'csrf_protection' => false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
