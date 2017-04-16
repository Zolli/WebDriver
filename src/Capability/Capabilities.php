<?php

namespace Zolli\WebDriver\Capability;

/**
 * List of all selenium and browser specific capability
 *
 * @package Zolli\WebDriver
 * @subpackage Capability
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class Capabilities
{

    /**
     * Selenium Specific
     */

    // Browser selection capability
    const SELENIUM_BROWSER_NAME = 'browserName';
    const SELENIUM_BROWSER_VERSION = 'version';
    const SELENIUM_PLATFORM = 'platform';

    // Read-only capabilities
    const HANDLES_ALERTS = 'handlesAlerts';
    const CSS_SELECTORS_ENABLED = 'cssSelectorsEnabled';

    // Read-write capabilities
    const JAVASCRIPT_ENABLED = 'javascriptEnabled';
    const DATABASE_ENABLED = 'databaseEnabled';
    const LOCATION_CONTEXT_ENABLED = 'locationContextEnabled';
    const APPLICATION_CACHE_ENABLED = 'applicationCacheEnabled';
    const BROWSER_CONNECTION_ENABLED = 'browserConnectionEnabled';
    const WEB_STORAGE_ENABLED = 'webStorageEnabled';
    const ACCEPT_SSL_CERTS = 'acceptSslCerts';
    const ROTATABLE = 'rotatable';
    const NATIVE_EVENTS = 'nativeEvents';
    const PROXY = 'proxy';
    const UNEXPECTED_ALERT_BEHAVIOUR = 'unexpectedAlertBehaviour';
    const ELEMENT_SCROLL_BEHAVIOUR = 'elementScrollBehavior';

    // RemoteWEbDriver specific capabilities
    const DISABLE_AUTOMATIC_SCREENSHOT_TAKING = 'webdriver.remote.quietExceptions';

    // Selenium-Grid specific capabilities
    const SELENIUM_PROTOCOL = 'seleniumProtocol';
    const MAX_INSTANCES = 'maxInstances';
    const ENVIRONMENT = 'environment ';

    // Selenium RC (1.0) only
    const COMMAND_LINE_FLAGS = 'commandLineFlags';
    const EXECUTABLE_PATH = 'executablePath';
    const TIMEOUT_IN_SECONDS = 'timeoutInSeconds';
    const ONLY_PROXY_SELENIUM_TRAFFIC = 'onlyProxySeleniumTraffic';
    const AVOID_PROXY = 'avoidProxy';
    const PROXY_EVERYTHING = 'proxyEverything';
    const PROXY_REQUIRED = 'proxyRequired';
    const BROWSER_SIDE_LOG = 'browserSideLog';
    const OPTIONS_SET = 'optionsSet';
    const SINGLE_WINDOW = 'singleWindow';
    const DONT_INJECT_REGEX = 'dontInjectRegex';
    const USER_JS_INTERACTION = 'userJSInjection';
    const USER_EXTENSIONS = 'userExtensions';

    // Selenese-Backed-WebDriver specific
    const SELENIUM_SERVER_URL = 'selenium.server.url';

    /**
     * Browser specific
     */

    // Chrome specific capabilities
    const CHROME_ARGS = 'args';
    const CHROME_BINARY = 'binary';
    const CHROME_EXTENSIONS = 'extensions';
    const CHROME_LOCAL_STATE = 'localState';
    const CHROME_PREFS = 'prefs';
    const CHROME_DETACH = 'detach';
    const CHROME_DEBUGGER_ADDRESS = 'debuggerAddress';
    const CHROME_EXCLUDE_SWITCHES = 'excludeSwitches';
    const CHROME_MINIDUMP_PATH = 'minidumpPath';
    const CHROME_MOBILE_EMULATION = 'mobileEmulation';
    const CHROME_PERF_LOGGING_PERFS = 'perfLoggingPrefs';
    const CHROME_WINDOW_TYPES = 'windowTypes';

}