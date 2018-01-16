module.exports = function (grunt) {
    'use strict';
    // Project configuration
    var autoprefixer    = require('autoprefixer');
    var flexibility     = require('postcss-flexibility');

    grunt.initConfig({
            pkg: grunt.file.readJSON('package.json'),

            rtlcss: {
                options: {
                    // rtlcss options
                    config: {
                        preserveComments: true,
                        greedy: true
                    },
                    // generate source maps
                    map: false
                },
            },


            copy: {
                main: {
                    options: {
                        mode: true
                    },
                    src: [
                        '**',
                        '!node_modules/**',
                        '!build/**',
                        '!css/sourcemap/**',
                        '!.git/**',
                        '!bin/**',
                        '!.gitlab-ci.yml',
                        '!bin/**',
                        '!tests/**',
                        '!phpunit.xml.dist',
                        '!*.sh',
                        '!*.map',
                        '!Gruntfile.js',
                        '!package.json',
                        '!.gitignore',
                        '!phpunit.xml',
                        '!README.md',
                        '!sass/**',
                        '!codesniffer.ruleset.xml',
                        '!vendor/**',
                        '!composer.json',
                        '!composer.lock',
                        '!package-lock.json',
                        '!phpcs.xml.dist',
                    ],
                    dest: 'astra/'
                },
                org: {
                    options: {
                        mode: true
                    },
                    src: [
                        '**',
                        // Admin directory only consists of graupi so this is being ignored.
                        '!admin/**',
                        '!class-brainstorm-update-astra-theme.php',
                        '!node_modules/**',
                        '!build/**',
                        '!css/sourcemap/**',
                        '!.git/**',
                        '!bin/**',
                        '!.gitlab-ci.yml',
                        '!bin/**',
                        '!tests/**',
                        '!phpunit.xml.dist',
                        '!phpcs.ruleset.xml',
                        '!*.sh',
                        '!*.map',
                        '!Gruntfile.js',
                        '!package.json',
                        '!.gitignore',
                        '!phpunit.xml',
                        '!wpml-config.xml',
                        '!README.md',
                        '!sass/**',
                        '!codesniffer.ruleset.xml',
                    ],
                    dest: 'astra/'
                }
            },

            compress: {
                main: {
                    options: {
                        archive: 'astra.zip',
                        mode: 'zip'
                    },
                    files: [
                        {
                            src: [
                                './astra/**'
                            ]

                        }
                    ]
                },
                org: {
                    options: {
                        archive: 'astra.zip',
                        mode: 'zip'
                    },
                    files: [
                        {
                            src: [
                                './astra/**'
                            ]

                        }
                    ]
                }
            },

            clean: {
                main: ["wp-remote-site-search"],
                zip: ["wp-remote-site-search.zip"]

            },

            makepot: {
                target: {
                    options: {
                        domainPath: '/',
                        potFilename: 'languages/wp-remote-site-search.pot',
                        potHeaders: {
                            poedit: true,
                            'x-poedit-keywordslist': true
                        },
                        type: 'wp-theme',
                        updateTimestamp: true
                    }
                }
            },

            addtextdomain: {
                options: {
                    textdomain: 'wp-remote-site-search',
                },
                target: {
                    files: {
                        src: [
                        	'*.php',
                        	'**/*.php',
                        	'!node_modules/**',
                        	'!php-tests/**',
                        	'!bin/**',
                        	'!admin/bsf-core/**'
                        ]
                    }
                }
            },

        }
    );

    // Load grunt tasks
    grunt.loadNpmTasks('grunt-rtlcss');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-wp-i18n');

    // rtlcss, you will still need to install ruby and sass on your system manually to run this
    grunt.registerTask('rtl', ['rtlcss']);

    // SASS compile
    grunt.registerTask('scss', ['sass']);

    // Style
    grunt.registerTask('style', ['scss', 'postcss:style', 'rtl']);

    // min all
    grunt.registerTask('minify', ['style', 'uglify:js', 'cssmin:css', 'concat']);

    // Grunt release - Create installable package of the local files
    grunt.registerTask('release', ['clean:zip', 'copy:main', 'compress:main', 'clean:main']);
    grunt.registerTask('org-release', ['clean:zip', 'copy:org', 'compress:org', 'clean:main']);

    // i18n
    grunt.registerTask('i18n', ['addtextdomain', 'makepot']);

    grunt.util.linefeed = '\n';
};

