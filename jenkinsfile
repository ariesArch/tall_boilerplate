pipeline {
    agent any
    stages {
        stage("Verify tooling") {
             steps {
                sh '''
                    docker info
                    docker version
                    docker compose version
                '''
            }
        }
        stage("Start Docker") {
            steps {
                sh 'make start'
                sh 'docker ps'
            }
        }
    }
}