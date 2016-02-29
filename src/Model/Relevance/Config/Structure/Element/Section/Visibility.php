<?php
/**
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Smile Elastic Suite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile_ElasticSuiteCore
 * @author    Romain Ruaud <romain.ruaud@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Smile\ElasticSuiteCore\Model\Relevance\Config\Structure\Element\Section;

/**
 * Relevance Config composite field visibility
 *
 * @category Smile
 * @package  Smile_ElasticSuiteCore
 * @author   Romain Ruaud <romain.ruaud@smile.fr>
 */
class Visibility extends \Smile\ElasticSuiteCore\Model\Relevance\Config\Structure\Element\Visibility
{
    /**
     * Check a configuration element visibility
     *
     * @param \Magento\Config\Model\Config\Structure\AbstractElement $element The config composite element
     * @param string                                                 $scope   The element scope
     *
     * @return bool
     */
    public function isVisible(\Magento\Config\Model\Config\Structure\AbstractElement $element, $scope)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/debug.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info("RORUA TESTING :: " . get_class($this));
        if (!$element->isAllowed()) {
            return false;
        }

        $isVisible = parent::isVisible($element, $scope);
        $logger->info("PARENT RESULT : " . (int) $isVisible);
        if ($isVisible) {
            $isVisible = $element->hasChildren() || $element->getFrontendModel();
        }

        $logger->info("SECTION RESULT : " . (int) $isVisible);
        return $isVisible;
    }
}
