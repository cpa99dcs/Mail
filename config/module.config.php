<?php
/**
 * Copyright (c) 2012 Jurian Sluiman.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     Soflomo\Mail
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2012 Jurian Sluiman.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://soflomo.com
 */

return array(
    'soflomo_mail' => array(
        'username'   => '',
        'password'   => '',

        'message'    => array(
            'from'      => '',
            'from_name' => '',
            'encoding'  => 'UTF-8',
        ),

        'transport' => array(
            'type'    => 'smtp',
            'options' => array(
                'name' => 'gmail.com',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'connection_class'  => 'login',
                'connection_config' => array(
                    'ssl'      => 'tls',
                    'username' => '%USERNAME%',
                    'password' => '%PASSWORD%',
                ),
            ),
        ),
    ),

    'service_manager' => array(
        'aliases' => array(
            'mail_transport' => 'Soflomo\Mail\Transport',
            'mail_message'   => 'Soflomo\Mail\Message',
        ),
        'factories' => array(
            'Soflomo\Mail\Transport' => 'Soflomo\Mail\Service\TransportFactory',
            'Soflomo\Mail\Message'   => 'Soflomo\Mail\Service\MessageFactory',
        ),
        'initializers' => array(
            'mail_transport' => 'Soflomo\Mail\Service\TransportAwareInitializer',
            'mail_message'   => 'Soflomo\Mail\Service\MessageAwareInitializer',
        ),
    )
);