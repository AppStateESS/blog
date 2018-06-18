<?php

/**
 * @author Matthew McNaney <mcnaneym@appstate.edu>
 */
function blog_update(&$content, $currentVersion)
{
    $home_directory = PHPWS_Boost::getHomeDir();

    switch ($currentVersion) {
        case version_compare($currentVersion, '1.10.4', '<'):
            $content[] = '<pre>Update in phpWebSite for versions prior to 1.10.4</pre>';
        case version_compare($currentVersion, '1.10.5', '<'):
            $content[] = <<<EOF
<pre>1.10.5
------------
+ Added new datetimepicker for date fields.
</pre>
EOF;
        case version_compare($currentVersion, '1.11.0', '<'):
            $content[] = <<<EOF
<pre>1.11.0
------------
+ Updated for Canopy
</pre>
EOF;
    } // end of switch
    return true;
}

function blogUpdateFiles($files, &$content)
{
    if (PHPWS_Boost::updateFiles($files, 'blog')) {
        $content[] = '--- Updated the following files:';
    } else {
        $content[] = '--- Unable to update the following files:';
    }
    $content[] = "     " . implode("\n     ", $files);
}
