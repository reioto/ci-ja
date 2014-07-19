Japanese Package for CodeIgniter
==============
This library is Japanese Package for CodeIgniter


Auto-Installation via composer
-----

<pre>
//composer.json
{
    "require": {
        "reioto/ci-ja": "dev-master"
    },
    "scripts": {
        "post-package-install": [
            "mkdir -p system/language",
            "cp -Rf vendor/reioto/ci-ja/language/japanese system/language/"
        ],
	"post-package-update": [
	    "rm -Rf system/language/japanese",
	    "cp -Rf vendor/reioto/ci-ja/language/japanese system/language/"
	],
        "post-package-uninstall": [
            "rm -Rf system/language/japanese"
        ]
    }
}
</pre>