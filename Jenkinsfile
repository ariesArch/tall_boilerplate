pipeline {
    // agent any
    agent {
    label 'ubuntu1-agent1' 
    }
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
        stage("Setup assets") {
            steps {
                sh 'make check-node'
                sh 'make build-assets'
            }
        }
        stage("Setup composer") {
            steps {
                sh 'make composer-install'
            }
        }
        stage("Setup Migration and Seeders") {
            steps {
                sh 'make migrate'
                sh 'make seed'
                sh 'make setup-permission'
            }
        }
        stage("Optimize") {
            steps {
                sh 'make optimize'
            }
        }
    }
}