<?php

namespace Sandbox\MainBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Cmf\Component\Routing\RouteAwareInterface;

/**
 * A document that we map to a controller
 *
 * @PHPCRODM\Document(referenceable=true)
 */
class DemoClassContent implements RouteAwareInterface
{
    /**
     * to create the document at the specified location. read only for existing documents.
     *
     * @PHPCRODM\Id
     */
    protected $path;

    /**
     * @PHPCRODM\Node
     */
    public $node;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\String()
     */
    public $name;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\String()
     */
    public $title;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\String()
     */
    public $body;



    /**
     * @PHPCRODM\Referrers(filter="routeContent")
     */
    public $routes;

    /**
     * Set repository path of this navigation item for creation
     */
    public function setPath($path)
    {
      $this->path = $path;
    }

    public function getPath()
    {
      return $this->path;
    }
    public function getContent()
    {
        return $this->body;
    }

    public function setContent($content)
    {
        $this->body = $content;
    }
    /**
     * @return array of route objects that point to this content
     */
    public function getRoutes()
    {
        return $this->routes->toArray();
    }
}
