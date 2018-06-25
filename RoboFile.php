<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function test($arg)
    {
    	$this->say("Menjalakan perintah dengan parameter: " . $arg);
    	$this->_exec("git " . $arg);
    }

    public function push($commitMessage, $branch = "master")
    {
    	$this->say("Pushing code to repository...");
    	$this->_exec("git add .");
    	$this->_exec("git commit -m \"" . $commitMessage . "\"");
    	$this->_exec("git push origin " . $branch);
    }
}