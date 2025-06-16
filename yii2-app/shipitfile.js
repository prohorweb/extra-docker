module.exports = function (shipit) {
    require('shipit-deploy')(shipit);
    shipit.initConfig({
        default: {
            workspace: '/tmp/worldgym-bitbuket',
            deployTo: '/var/www/html/daimler',
            repositoryUrl: 'https://illyar80@bitbucket.org/artur_blago/extrasport.git',
            ignores: ['.git', 'node_modules'],
            keepReleases: 5,
            //key: '~/.ssh/my_key',
            branch: 'master'
        },
        develop: {
            servers: 'ivanlaparu@77.222.61.24',
            deployTo: 'extrasport/public_html',
            branch: 'master'
        },
        prod: {
            servers: 'balvyandex@77.222.62.180',
            deployTo: 'public_html',
            branch: 'master'
        },
        /*prod: {
            servers: 'u27294@95.213.143.187:34716',
            deployTo: 'www/new.extra.local',
            branch: 'master'
        },*/
    });

    shipit.task('deploy', function () {
        return shipit.remote('cd ' + shipit.config.deployTo + ' && git checkout ' + shipit.config.branch + ' && git pull origin ' + shipit.config.branch + ' && php7.4 yii migrate --interactive=0 && php7.4 yii migrate --interactive=0 --db=db2  && php7.4 yii migrate --interactive=0 --db=db3 && php7.4 yii migrate --interactive=0 --db=db4'/* + ' && php7.4 composer.phar update'*/);
    });
};