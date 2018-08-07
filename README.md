# Magento Catch Request

(Revived) A tiny Magento 1.x module to help with debugging by writing the Request Parameters as magento sees them to the `system.log` on each page load. It's mostly useful when you are working with many extensions or encrypted extension files.

## Installation

1. Copy Files to your Magento folder.
2. Make sure logging is turned on, in Admin go to: _System > Configuration > Developer > Log Settings_ and Enable them.
3. You're done. Watch the var/system.log for your Request Params.

#### Files

    |-- app/
        |-- code/
        |   |-- community/
        |       |-- Technique/
        |           |-- CatchRequest/
        |               |-- Model/
        |               |   |-- Observer.php
        |               |-- etc/
        |                   |-- config.xml
        |-- etc/
            |-- modules/
                |-- Technique_CatchRequest.xml


## Mods

### Event
It's currently configured to log at the event `http_response_send_before` but you can change the event to any one that's relevant, here's a [handy cheat sheet of the events](https://www.nicksays.co.uk/magento-events-cheat-sheet-1-9/) thanks to @punkstar. 

__app/code/community/Technique/CatchRequest/etc/config.xml__
```xml
<events>
    <http_response_send_before>    <!-- Change this event -->
        <observers>
            <technique_catchrequest>
                <class>technique_catchrequest/observer</class>
                <method>catchRequest</method>
                <type>singleton</type>
            </technique_catchrequest>
        </observers>
    </http_response_send_before>    <!-- and the closing tag -->
</events>
```

## MageXM
For users of Technique's [MageXM](https://magexm.com) we encourage you to use this while adding custom javascript or modifying your theme.