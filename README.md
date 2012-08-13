Utility Package for Fuel
========================

Introduction
------------

The Utility Package maintains a set of basic and regular helper/utility methods that are regularly used by any developer.

# Usage

Get Unique Id
-------------
    Util::getUUID()
    //returns a Universally Unique Identifier
    //Example: a3424ea0-e558-11e1-aff1-0800200c9a66


Convert String To Title
-----------------------

    Util::stringToTitle($title)
    //Converts $title to Title Case, and returns the result.


Get Time Difference Like Facebook
---------------------------------

    Util:getTimeDifference($time)
    //Finds the Time difference for a given time from the current time in words similar to Facebook
    //Returns: 12 seconds ago or
    //          4 minutes ago