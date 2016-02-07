<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use Illuminate\Contracts\Auth as Interfaces;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Solvre\Model\Doctrine\Traits\PersonalDetails;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\UserRepository")
 * @Table(name="user")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class User implements Interfaces\Authenticatable
{
    use Authenticatable,
        Identifiable,
        PersonalDetails;

    /**
     *
     *  Permission[]
     */
    private $excludesPermission;

    /**
     * @OneToMany(targetEntity="Notification", mappedBy="user")
     */
    private $notifications = array();

//    /**
//     * @ManyToOne(targetEntity="Role", inversedBy="user")
//     * @JoinColumn(name="role_id", referencedColumnName="id")
//     */
//    private $role;

    /**
     * @OneToMany(targetEntity="Issue", mappedBy="user")
     */
    private $issues = array();

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments = array();

    /**
     * @OneToMany(targetEntity="UserInProject", mappedBy="user")
     */
    private $projects = array();

    /**
     * @OneToMany(targetEntity="Dashboard", mappedBy="user")
     */
    private $dashboards = array();

    /**
     * @OneToMany(targetEntity="Board", mappedBy="user")
     */
    private $board = array();

    /**
     * User constructor.
     */
    public function __construct()
    {
        if( func_num_args() > 0 ) {
            $data = func_get_arg(0);
            $this->firstName = $data['name'];
            $this->email = $data['email'];
            $this->password = $data['password'];
        }
    }

    /**
     * @return mixed
     */
    public function getExcludesPermission()
    {
        return $this->excludesPermission;
    }

    /**
     * @param mixed $excludesPermission
     */
    public function setExcludesPermission($excludesPermission)
    {
        $this->excludesPermission = $excludesPermission;
    }

    /**
     * @return Notification
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param Notification $notifications
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @param mixed $issues
     */
    public function setIssues($issues)
    {
        $this->issues = $issues;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param mixed $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }

    /**
     * @return mixed
     */
    public function getDashboards()
    {
        return $this->dashboards;
    }

    /**
     * @param mixed $dashboards
     */
    public function setDashboards($dashboards)
    {
        $this->dashboards = $dashboards;
    }

    /**
     * @return mixed
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @param mixed $board
     */
    public function setBoard($board)
    {
        $this->board = $board;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

}

?>