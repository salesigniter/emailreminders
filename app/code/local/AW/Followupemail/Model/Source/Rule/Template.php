<?php
/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/AW-LICENSE.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This software is designed to work with Magento community edition and
 * its use on an edition other than specified is prohibited. aheadWorks does not
 * provide extension support in case of incorrect edition use.
 * =================================================================
 *
 * @category   AW
 * @package    AW_Followupemail
 * @version    3.5.8
 * @copyright  Copyright (c) 2010-2012 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE.txt
 */

class AW_Followupemail_Model_Source_Rule_Template
{
    const TEMPLATE_SOURCE_EMAIL = 'email';
    const TEMPLATE_SOURCE_NEWSLETTER = 'nsltr';
    const TEMPLATE_SOURCE_SEPARATOR = ':';

    /*
     * Returns email template names
     * @return array
     */
    public function getEmailTemplates()
    {
        $templates = array();
        $templates[self::TEMPLATE_SOURCE_EMAIL] = Mage::helper('followupemail')->__('Email Templates');

        $templateArray = Mage::getResourceSingleton('core/email_template_collection')->toArray();
        foreach ($templateArray['items'] as $value) {
            $key = self::TEMPLATE_SOURCE_EMAIL . self::TEMPLATE_SOURCE_SEPARATOR . $value['template_id'];
            $templates[$key] = $value['template_code'];
        }

        $templates[self::TEMPLATE_SOURCE_NEWSLETTER] = Mage::helper('followupemail')->__('Newsletter Templates');
        $templateArray = Mage::getResourceModel('newsletter/template_collection')->load();
        foreach ($templateArray as $item) {
            $key = self::TEMPLATE_SOURCE_NEWSLETTER . self::TEMPLATE_SOURCE_SEPARATOR . $item->getData('template_id');
            $templates[$key] = $item->getData('template_code');
        }
        return $templates;
    }

}