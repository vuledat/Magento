<?php

namespace Api\ApiMultivendor\Api;

interface CustomRepositoryInterface
{
    /**
     * Create custom Api.
     *
     * @param \CodeTheatres\CustomApi\Api\Data\CustomDataInterface $entity
     * @return \CodeTheatres\CustomApi\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function create(
        \Api\ApiMultivendor\Api\Data\CustomDataInterface $entity
    );

    /**
     * Update custom Api.
     *
     * @param \CodeTheatres\CustomApi\Api\Data\CustomDataInterface $entity
     * @return \CodeTheatres\CustomApi\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function update(
        \Api\ApiMultivendor\Api\Data\CustomDataInterface $entity
    );

    /**
     * Get custom Api.
     *
     * @param int $id
     * @return \CodeTheatres\CustomApi\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($id
    );

    /**
     * Delete custom Api.
     *
     * @param int $id
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete($id
    );
}