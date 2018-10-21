<?php

namespace Magestore\Multivendor\Api\Data;

/**
 * @api
 */
interface TestdataInterface
{

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($id);
    /**
     * Get age
     *
     * @return string
     */
    public function getAge();

    /**
     * Set age
     *
     * @param string $name
     * @return $this
     */
    public function setAge($id);

}