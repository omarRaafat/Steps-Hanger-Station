pipeline {

	// where to put all general variables and Jenkins environment variables 
	environment {
    registry = "omar2023/lara101"
    registryCredential = credentials('dkh2023')
    dockerImage = "$registry:${GIT_COMMIT}-${JOB_NAME}"	
  }
    agent { 
	    // which server to deploy on
         node {
            label 'worker-remote-node'
         }
      }
    triggers {
        pollSCM '* * * * *'
    }
    stages {
      stage('Setup parameters') {
            steps {
                script { 
                    properties([
			    // predefined Jenkins pipeline parameters (string type )
                       
                        parameters([
                            string(
                                defaultValue: 'service nginx start', 
                                name: 'COMMAND', 
                                trim: false
                            ),
                            booleanParam(
                                defaultValue:false,
                                name:'DKH_PUSH',
                                description:''
                            )
                        ])
                    ])
                }
            }
        }
        stage('Building Docker Image....') {
            steps {
                echo "Building..."
		    // build docker image from docker file injecting source code 
            // first command to update dockerimage value with the new one
            // second command removes all running container , networks and images (from docker compose only)
            // third one create new ones
                     sh '''
                     
		                sed -i.bak "s|dockerImage|${dockerImage}|g" docker-compose.yml  
                        sed -i.bak "s|containerName|${BUILD_NUMBER}-lara101-app|g" docker-compose.yml  
                  	    docker-compose -f docker-compose.yml build   
 
          			'''
		    
            }
        }

        stage('Deploying App Container ... '){
    //create a new image from the current one (job101:latest) to push it to the docker hub
    // add checker to check whether need to run this command or not
      
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                     sh " docker-compose -f docker-compose.yml up -d "
                     //  send notification to slack after deploy 
                        slackSend channel: '#jenkins-notifications', color: 'good', message: 'Application Deployed successfully !'
		}
        }
        
	 stage('Clean Environment ....'){
            steps {
          echo "Environment Cleaning Process....."

		    //Delete all unnecessary resources 
            sh '''
            
               docker system prune -a -f
            '''
            }
        }
        stage('Testing ....') {
            steps {
                echo "Testing.."
		    //Open the running application container and execute this command  
              sh "docker exec ${BUILD_NUMBER}-lara101-app ${params.COMMAND}"  
            }
        }
        stage('DockerHub Pushing ...') {
		//Push the new tag image to the docker hub (true or false to skip this stage)
          when{
          expression{
            params.DKH_PUSH
          }
       }
            steps {
                echo 'Deliver....'
                //Get docker hub credentials and log in to the docker hub account then push the image to the repo
                sh '''
                echo $registryCredential_PSW | docker login -u $registryCredential_USR --password-stdin
                docker push ${dockerImage}
                docker logout
                
  		'''
            }
        }
    }
}