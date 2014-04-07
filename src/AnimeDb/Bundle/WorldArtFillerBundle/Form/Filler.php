<?php
/**
 * AnimeDb package
 *
 * @package   AnimeDb
 * @author    Peter Gribanov <info@peter-gribanov.ru>
 * @copyright Copyright (c) 2011, Peter Gribanov
 * @license   http://opensource.org/licenses/GPL-3.0 GPL v3
 */

namespace AnimeDb\Bundle\WorldArtFillerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AnimeDb\Bundle\WorldArtFillerBundle\Service\Filler as FillerService;

/**
 * Get item from filler
 *
 * @package AnimeDb\Bundle\WorldArtFillerBundle\Form
 * @author  Peter Gribanov <info@peter-gribanov.ru>
 */
class Filler extends AbstractType
{

    /**
     * HTTP host
     *
     * @var string
     */
    protected $host;

    /**
     * Construct
     *
     * @param string $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Form\AbstractType::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('url', 'text', [
                'label' => 'URL address',
                'attr' => [
                    'placeholder' => $this->host.'/',
                ],
            ])
            ->add('frames', 'checkbox', [
                'label' => 'Upload frames',
                'required' => false
            ]);
    }

    /**
     * (non-PHPdoc)
     * @see \Symfony\Component\Form\FormTypeInterface::getName()
     */
    public function getName()
    {
        return 'animedb_worldartfillerbundle_filler';
    }
}