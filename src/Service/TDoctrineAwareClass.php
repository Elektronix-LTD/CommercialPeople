<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 10.09.2018
 * Time: 01:22
 */

namespace App\Service;


use Doctrine\Common\Persistence\ManagerRegistry;

trait TDoctrineAwareClass
{
    /** @var ManagerRegistry $doctrine */
    private $doctrine;

    /**
     * @return ManagerRegistry
     */
    protected function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * @param ManagerRegistry $doctrine
     * @return self
     */
    protected function setDoctrine($doctrine): self
    {
        $this->doctrine = $doctrine;
        return $this;
    }
}