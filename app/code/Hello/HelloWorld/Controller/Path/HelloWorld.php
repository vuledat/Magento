<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/19/2018
 * Time: 8:32 PM
 */

namespace Magestore\Multivendor\Controller\Path;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class HelloWorld extends  Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        echo "Hello World";
    }
}