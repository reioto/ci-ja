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
        "pre-autoload-dump": [
            "mkdir -p system/language/japanese",
            "rm -Rf system/language/japanese",
            "cp -Rf vendor/reioto/ci-ja/language/japanese system/language/"
        ]
    }
}
</pre>
