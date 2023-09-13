<?php

namespace App\Controller;

use App\Service\Various\Breadcrumb;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class FrontController extends AbstractController
{
    public function __construct(
        public Breadcrumb $breadcrumb,
        public TranslatorInterface $translatorInterface
    ) {
        
    }

    /**
     * Pour les addFlash traduits
     * @param $type
     * @param $message
     */
    public function tAddFlash($type, $message)
    {
        $this->addFlash(
            $type,
            $this->translatorInterface->trans($message)
        );
    }
}