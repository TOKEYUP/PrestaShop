<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShopBundle\Form\Admin\Configure\AdvancedParameters\Import;

use PrestaShop\PrestaShop\Core\Form\FormDataProviderInterface;
use PrestaShop\PrestaShop\Core\Form\FormHandlerInterface;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * This class manages the data submitted in first step of import
 * in "Configure > Advanced Parameters > Import" page.
 */
final class ImportFormHandler implements FormHandlerInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var FormDataProviderInterface
     */
    private $formDataProvider;

    public function __construct(FormFactoryInterface $formFactory, FormDataProviderInterface $formDataProvider)
    {
        $this->formFactory = $formFactory;
        $this->formDataProvider = $formDataProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return $this->formFactory->createNamed('', ImportType::class, $this->formDataProvider->getData());
    }

    /**
     * {@inheritdoc}
     */
    public function save(array $data)
    {
        return $this->formDataProvider->setData($data);
    }
}
