<?php
/**
 * @project           Technique_CatchRequest
 * @file              Observer.php
 * @author            Will Furphy - https://www.technique.software
 * Year:              2018
 */

class Technique_CatchRequest_Model_Observer
{

    /**
     * Writes all Request Params to the system.log.
     *
     * @param \Varien_Event_Observer $observer
     */
    public function catchRequest(Varien_Event_Observer $observer)
    {
        $event_name = (string) $observer->getEvent()->getName();
        $request = (array) Mage::app()->getRequest()->getParams();
        $message = "Technique Catch Request $event_name: ". PHP_EOL. var_export($request,true);

        Mage::log($message);
    }

}