<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function push($commitMessage, $origin = "origin", $branch = "master")
    {
        $this->standardize();
    	$this->say("Pushing code to repository...");
    	$this->taskGitStack()
    		->stopOnFail()
    		->add('.')
    		->commit($commitMessage)
    		->push($origin, $branch)
    		->run();
    }

    public function standardize()
    {
        $this->say("Standardize coding style using PHP CodeSniffer...");
        $this->_exec("phpcbf application/controllers application/models application/views application/core");
    }
}