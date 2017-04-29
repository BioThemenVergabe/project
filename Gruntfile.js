var log, terminal;

terminal = require('color-terminal');

log = function(error, stdout, stderr, cb) {
    if (error) {
        terminal.color('red').write(stdout);
    } else {
        terminal.color('green').write(stdout);
    }
    return cb();
};

module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-shell');
    grunt.initConfig({
        testFilepath: null,
        watch: {
            php: {
                options: {
                    event: 'changed',
                    spawn: false
                },
                files: ['tests/**/*.php', 'tests/**/*Test.php'],
                tasks: 'shell:phpunit'
            }
        },
        shell: {
            phpunit: {
                options: {
                    callback: log
                },
                command: 'echo <%= testFilepath %> && phpunit -c app <%= testFilepath %>'
            }
        }
    });

    grunt.registerTask('default', ['watch','shell']);

    return grunt.event.on('watch', function(action, filepath, ext) {
        var regex, testFilepath;
        regex = new RegExp("tests/([a-z0-9]+)/([a-z0-9/]+)", "i");
        if (filepath.match(regex)) {
            if (filepath.indexOf('Test') === -1) {
                testFilepath = filepath.replace(regex, "tests/$1/Tests/$2Test");
            } else {
                testFilepath = filepath;
            }
            return grunt.config('testFilepath', testFilepath);
        }
    });

};