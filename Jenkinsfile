pipeline {

    agent {
        node {
            label ''
        }
    }

    stages {
        
        stage('Cleanup Workspace') {
            steps {
                bat """
                dir
                """
            }
        }

    }   
}
