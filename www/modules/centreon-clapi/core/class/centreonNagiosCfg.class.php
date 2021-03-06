<?php
/**
 * Copyright 2005-2015 CENTREON
 * Centreon is developped by : Julien Mathis and Romain Le Merlus under
 * GPL Licence 2.0.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation ; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses>.
 *
 * Linking this program statically or dynamically with other modules is making a
 * combined work based on this program. Thus, the terms and conditions of the GNU
 * General Public License cover the whole combination.
 *
 * As a special exception, the copyright holders of this program give CENTREON
 * permission to link this program with independent modules to produce an executable,
 * regardless of the license terms of these independent modules, and to copy and
 * distribute the resulting executable under terms of CENTREON choice, provided that
 * CENTREON also meet, for each linked independent module, the terms  and conditions
 * of the license of that module. An independent module is a module which is not
 * derived from this program. If you modify this program, you may extend this
 * exception to your version of the program, but you are not obliged to do so. If you
 * do not wish to do so, delete this exception statement from your version.
 *
 * For more information : contact@centreon.com
 *
 * SVN : $URL$
 * SVN : $Id$
 */

require_once "centreonObject.class.php";
require_once "centreonInstance.class.php";
require_once "Centreon/Object/Nagios/Nagios.php";
require_once "Centreon/Object/Command/Command.php";

/**
 *
 * @author sylvestre
 */
class CentreonNagiosCfg extends CentreonObject
{
    const ORDER_UNIQUENAME        = 0;
    const ORDER_INSTANCE          = 1;
    const ORDER_COMMENT           = 2;
    protected $instanceObj;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->instanceObj = new CentreonInstance();
        $this->object = new Centreon_Object_Nagios();
        $this->params = array(  'log_file'                           	  => '/var/log/nagios/nagios.log',
                                'cfg_dir'                                 => '/etc/nagios/',
                                'temp_file'                               => '/var/log/nagios/nagios.tmp',
                                'p1_file'                                 => '/usr/sbin/p1.pl',
                                'nagios_user'                             => 'nagios',
                                'nagios_group'                            => 'nagios',
                                'enable_notifications'                    => '0',
                                'execute_service_checks'                  => '1',
                                'accept_passive_service_checks'           => '1',
                                'execute_host_checks'                     => '2',
                                'accept_passive_host_checks'              => '2',
                                'enable_event_handlers'                   => '1',
                                'log_rotation_method'                     => 'd',
                                'log_archive_path'                        => '/var/log/nagios/archives/',
                                'check_external_commands'                 => '1',
                                'command_check_interval'                  => '1s',
                                'command_file'                            => '/var/log/nagios/rw/nagios.cmd',
                                'lock_file'                               => '/var/log/nagios/nagios.lock',
                                'retain_state_information'                => '1',
                                'state_retention_file'                    => '/var/log/nagios/status.sav',
                                'retention_update_interval'               => '60',
                                'use_retained_program_state'              => '1',
                                'use_retained_scheduling_info'            => '1',
                                'use_syslog'                              => '0',
                                'log_notifications'                       => '1',
                                'log_service_retries'                     => '1',
                                'log_host_retries'                        => '1',
                                'log_event_handlers'                      => '1',
                                'log_initial_states'                      => '1',
                                'log_external_commands'                   => '1',
                                'log_passive_checks'                      => '2',
                                'sleep_time'                              => '1',
                                'service_inter_check_delay_method'        => 's',
                                'service_interleave_factor'               => 's',
                                'max_concurrent_checks'                   => '200',
                                'max_service_check_spread'                => '5',
                                'check_result_reaper_frequency'           => '5',
                                'interval_length'                         => '60',
                                'auto_reschedule_checks'                  => '2',
                                'enable_flap_detection'                   => '0',
                                'low_service_flap_threshold'              => '25.0',
                                'high_service_flap_threshold'             => '50.0',
                                'low_host_flap_threshold'                 => '25.0',
                                'high_host_flap_threshold'                => '50.0',
                                'soft_state_dependencies'                 => '0',
                                'service_check_timeout'                   => '60',
                                'host_check_timeout'                      => '10',
                                'event_handler_timeout'                   => '30',
                                'notification_timeout'                    => '30',
                                'ocsp_timeout'                            => '5',
                                'ochp_timeout'                            => '5',
                                'perfdata_timeout'                        => '5',
        						'obsess_over_services'                    => '0',
                                'obsess_over_hosts'                       => '2',
                                'process_performance_data'                => '0',
                                'host_perfdata_file_mode'                 => '2',
                                'service_perfdata_file_mode'              => '2',
                                'check_for_orphaned_services'             => '0',
                                'check_for_orphaned_hosts'                => '',
                                'check_service_freshness'                 => '2',
                                'check_host_freshness'                    => '2',
                                'date_format'                             => 'euro',
                                'illegal_object_name_chars'               => "~!$%^&*\"|'<>?,()=",
                                'illegal_macro_output_chars'              => "`~$^&\"|'<>",
                                'use_regexp_matching'                     => '2',
                                'use_true_regexp_matching'                => '2',
                                'admin_email'                             => 'admin@localhost',
                                'admin_pager'                             => 'admin',
                                'nagios_activate'                         => '1',
                                'event_broker_options'                    => '-1',
                                'enable_predictive_host_dependency_checks'=> '2',
                                'enable_predictive_service_dependency_checks'=> '2',
                                'use_large_installation_tweaks'           => '2',
                                'free_child_process_memory'               => '2',
                                'child_processes_fork_twice'              => '2',
                                'enable_environment_macros'               => '2',
                                'enable_embedded_perl'                    => '2',
                                'use_embedded_perl_implicitly'            => '2',
                                'debug_level'                             => '0',
                                'debug_level_opt'                         => '0',
                                'debug_verbosity'                         => '2'
                            );
        $this->nbOfCompulsoryParams = 3;
        $this->activateField = "nagios_activate";
    }

    /**
     * Set Broker Module
     *
     * @param int $objectId
     * @param string $brokerModule
     * @return void
     * @todo we should implement this object in the centreon api so that we don't have to write our own query
     */
    protected function setBrokerModule($objectId, $brokerModule)
    {
        $query = "DELETE FROM cfg_nagios_broker_module WHERE cfg_nagios_id = ?";
        $this->db->query($query, array($objectId));
        $brokerModuleArray = explode("|", $brokerModule);
        foreach ($brokerModuleArray as $bkModule) {
            $this->db->query("INSERT INTO cfg_nagios_broker_module (cfg_nagios_id, broker_module) VALUES (?, ?)", array($objectId, $bkModule));
        }
    }

    /**
     * Add action
     *
     * @param string $parameters
     * @return void
     */
    public function add($parameters)
    {
        $params = explode($this->delim, $parameters);
        if (count($params) < $this->nbOfCompulsoryParams) {
            throw new CentreonClapiException(self::MISSINGPARAMETER);
        }
        $addParams = array();
        $addParams[$this->object->getUniqueLabelField()] = $params[self::ORDER_UNIQUENAME];
        $addParams['nagios_server_id'] = $this->instanceObj->getInstanceId($params[self::ORDER_INSTANCE]);
        $addParams['nagios_comment'] = $params[self::ORDER_COMMENT];
        $this->params = array_merge($this->params, $addParams);
        $this->checkParameters();
        $objectId = parent::add();
        $this->setBrokerModule($objectId, "/usr/lib/nagios/ndomod.o config_file=/etc/nagios/ndomod.cfg");
    }

    /**
     * Set Parameters
     *
     * @param string $parameters
     * @return void
     * @throws Exception
     */
    public function setparam($parameters)
    {
        $params = explode($this->delim, $parameters);
        if (count($params) < self::NB_UPDATE_PARAMS) {
            throw new CentreonClapiException(self::MISSINGPARAMETER);
        }
        if (($objectId = $this->getObjectId($params[self::ORDER_UNIQUENAME])) != 0) {
            $commandColumns = array('global_host_event_handler',
            						'global_service_event_handler',
            						'host_perfdata_command',
            						'service_perfdata_command',
                                    'host_perfdata_file_processing_command',
                                    'service_perfdata_file_processing_command',
                                    'ocsp_command',
                                    'ochp_command');
            if ($params[1] == "instance" || $params[1] == "nagios_server_id") {
                $params[1] = "nagios_server_id";
                $params[2] = $this->instanceObj->getInstanceId($params[2]);
            } elseif ($params[1] == "broker_module") {
                $this->setBrokerModule($objectId, $params[2]);
            } elseif (preg_match('/('.implode('|', $commandColumns).')/', $params[1], $matches)) {
                $commandName = $matches[1];
                if ($params[2]) {
                    $commandObj = new Centreon_Object_Command();
                    $res = $commandObj->getIdByParameter($commandObj->getUniqueLabelField(), $params[2]);
                    if (count($res)) {
                        $params[2] = $res[0];
                    } else {
                        throw new CentreonClapiException(self::OBJECT_NOT_FOUND.":".$params[2]);
                    }
                } else {
                    $params[2] = NULL;
                }
            }
            if ($params[1] != "broker_module") {
                $p = strtolower($params[1]);
                if ($params[2] == "") {
                    if (isset($this->params[$p]) && $this->params[$p] == 2) {
                        $params[2] = $this->params[$p];
                    } else {
                        $params[2] = NULL;
                    }
                }
                $updateParams = array($params[1] => $params[2]);
                parent::setparam($objectId, $updateParams);
            }

        } else {
            throw new CentreonClapiException(self::OBJECT_NOT_FOUND.":".$params[self::ORDER_UNIQUENAME]);
        }
    }

    /**
     * Show
     *
     * @return void
     */
    public function show($parameters = null)
    {
        $filters = array();
        if (isset($parameters)) {
            $filters = array($this->object->getUniqueLabelField() => "%".$parameters."%");
        }
        $params = array("nagios_id", "nagios_name", "nagios_server_id", "nagios_comment");
        $paramString = str_replace("_", " ", implode($this->delim, $params));
        $paramString = str_replace("nagios server id", "instance", $paramString);
        echo $paramString . "\n";
        $elements = $this->object->getList($params, -1, 0, null, null, $filters);
        foreach ($elements as $tab) {
            $str = "";
            foreach ($tab as $key => $value) {
                if ($key == "nagios_server_id") {
                    $value = $this->instanceObj->getInstanceName($value);
                }
                $str .= $value . $this->delim;
            }
            $str = trim($str, $this->delim) . "\n";
            echo $str;
        }
    }
}