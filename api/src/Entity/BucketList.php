<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
*
* @ApiResource
* @ORM\Entity
*/
class BucketList
{
   /**
    * @var int The id of a bucketlist.
    *
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
   private $id;

   /**
    * @var string The name of the bucketlist.
    *
    * @ORM\Column(nullable=true)
    */
   public $name;

    /**
    * @var string The description of the bucketlist.
    *
    * @ORM\Column(type="text")
    */
   public $description;

     /**
    * @var \DateTimeInterface When the bucketlist was updated.
    *
    * @ORM\Column(nullable=true)
    */
   public $updatedAt;

   /**
    * @var \DateTimeInterface When the bucketlist was created.
    *
    * @ORM\Column(type="datetime")
    */
   public $createdAt;

   public function getId(): ?int
   {
       return $this->id;
   }
}
