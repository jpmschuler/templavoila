#!/bin/bash
function updateEmconf {
    export versionLine=$(grep "'version' => '" $1)
    sed -i.bak s/"$versionLine"/"$newVersion"/g  $1
    rm "$1.bak"
    git add $1
}
function updateComposer {
    export versionLine=$(grep "\"version\": \"" $1)
    sed -i.bak s/"$versionLine"/"$newComposerVersion"/g  $1
    rm "$1.bak"
    git add $1
}



if [ $# -eq 1 ]; then
    export newVersion="    'version' => '$1',"
    export newComposerVersion="    \"version\": \"$1\","
	#updateEmconf "ito_admint3/ext/ext_emconf.php"
	updateEmconf "ext_emconf.php"
    updateComposer "composer.json"
    updateComposer "package.json"
else
    echo "You didn't specify a version, detecting current version..."
  grep 'version' ext_emconf.php | sed -e 's/^[[:space:]]*//'
fi