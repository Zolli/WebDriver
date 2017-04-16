<?php

namespace Zolli\WebDriver\Http\Command;

use PHPUnit\TextUI\Command;
use Zolli\WebDriver\Command\Commands;
use Zolli\WebDriver\Exception\MissingUrlMappingException;
use Zolli\WebDriver\Http\Command\HttpCommand;

/**
 * This class used to create command classes that sent through the transport
 *
 * @package Zolli\WebDriver
 * @subpackage Http\Command
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class HttpCommandFactory extends AbstractCommandFactory
{

    /**
     * This array contains the full mapping of commands to actual
     * URL and HTTP method
     *
     * @var array
     */
    protected $mapping = [
        Commands::QUERY_STATUS => [
            'method' => 'GET',
            'url' => '/status',
        ],
        Commands::CREATE_SESSION => [
            'method' => 'POST',
            'url' => '/session',
        ],
        Commands::GET_SESSIONS => [
            'method' => 'GET',
            'url' => '/sessions',
        ],
        Commands::GET_SESSION_BY_ID => [
            'method' => 'GET',
            'url' => '/session/:sessionId',
        ],
        Commands::DELETE_SESSION_BY_ID => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId',
        ],
        Commands::SET_SESSION_TIMEOUTS => [
            'method' => 'POST',
            'url' => '/session/:sessionId/timeouts',
        ],
        Commands::SET_SESSION_TIMEOUT_ASYNC_SCRIPT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/timeouts/async_script',
        ],
        Commands::SET_SESSION_TIMEOUT_IMPLICIT_WAIT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/timeouts/implicit_wait',
        ],
        Commands::GET_WINDOW_HANDLE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/window_handle',
        ],
        Commands::GET_WINDOWS_HANDLES => [
            'method' => 'GET',
            'url' => '/session/:sessionId/window_handles',
        ],
        Commands::GET_SESSION_URL => [
            'method' => 'GET',
            'url' => '/session/:sessionId/url',
        ],
        Commands::NAVIGATE_TO_URL => [
            'method' => 'POST',
            'url' => '/session/:sessionId/url',
        ],
        Commands::NAVIGATE_FORWARD => [
            'method' => 'POST',
            'url' => '/session/:sessionId/forward',
        ],
        Commands::NAVIGATE_BACK => [
            'method' => 'POST',
            'url' => '/session/:sessionId/back',
        ],
        Commands::NAVIGATE_REFRESH => [
            'method' => 'POST',
            'url' => '/session/:sessionId/refresh',
        ],
        Commands::EXECUTE_SCRIPT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/execute',
        ],
        Commands::EXECUTE_SCRIPT_ASYNC => [
            'method' => 'POST',
            'url' => '/session/:sessionId/execute_async',
        ],
        Commands::TAKE_SCREENSHOT => [
            'method' => 'GET',
            'url' => '/session/:sessionId/screenshot',
        ],
        Commands::GET_ALL_IME_ENGINES => [
            'method' => 'get',
            'url' => '/session/:sessionId/ime/available_engines',
        ],
        Commands::GET_ACTIVE_IME_ENGINE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/ime/active_engine',
        ],
        Commands::GET_ACTIVATED_IME_ENGINE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/ime/activated',
        ],
        Commands::DETACH_CURRENT_IME_ENGINE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/ime/deactivate',
        ],
        Commands::ATTACH_IME_ENGINE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/ime/activate',
        ],
        Commands::CHANGE_FOCUS => [
            'method' => 'POST',
            'url' => '/session/:sessionId/frame',
        ],
        Commands::CHANGE_FOCUS_TO_PARENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/frame/parent',
        ],
        Commands::CHANGE_FOCUS_TO_WINDOW => [
            'method' => 'POST',
            'url' => '/session/:sessionId/window',
        ],
        Commands::CLOSE_CURRENT_WINDOW => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/window',
        ],
        Commands::SET_WINDOW_SIZE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/window/:windowHandle/size',
        ],
        Commands::GET_WINDOW_SIZE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/window/:windowHandle/size',
        ],
        Commands::SET_WINDOW_POSITION => [
            'method' => 'POST',
            'url' => '/session/:sessionId/window/:windowHandle/position',
        ],
        Commands::GET_WINDOW_POSITION => [
            'method' => 'GET',
            'url' => '/session/:sessionId/window/:windowHandle/position',
        ],
        Commands::SET_WINDOW_MAXIMIZED => [
            'method' => 'POST',
            'url' => '/session/:sessionId/window/:windowHandle/maximize',
        ],
        Commands::GET_ALL_COOKIES => [
            'method' => 'GET',
            'url' => '/session/:sessionId/cookie',
        ],
        Commands::SET_COOKIE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/cookie',
        ],
        Commands::DELETE_ALL_COOKIE => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/cookie',
        ],
        Commands::DELETE_NAMED_COOKIE => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/cookie/:name',
        ],
        Commands::GET_PAGE_SOURCE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/source',
        ],
        Commands::GET_PAGE_TITLE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/source'
        ],
        Commands::SEARCH_ELEMENT_FROM_ROOT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element',
        ],
        Commands::SEARCH_ELEMENTS_FROM_ROOT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/elements',
        ],
        Commands::GET_CURRENTLY_FOCUSED_ELEMENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/active',
        ],
        Commands::DESCRIBE_ELEMENT => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id',
        ],
        Commands::SEARCH_ELEMENT_FROM_ANOTHER => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/element',
        ],
        Commands::SEARCH_ELEMENTS_FROM_ANOTHER => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/elements',
        ],
        Commands::CLICK_ON_ELEMENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/click',
        ],
        Commands::SUBMIT_FORM_ELEMENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/submit',
        ],
        Commands::GET_TEXT_FROM_ELEMENT => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/text',
        ],
        Commands::SEND_KEY_STROKES_TO_ELEMENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/value',
        ],
        Commands::SEND_KEY_STROKES_TO_ACTIVE_ELEMENT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/keys',
        ],
        Commands::GET_ELEMENT_TAG_NAME => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/name',
        ],
        Commands::CLEAR_INPUT_VALUE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/element/:id/clear',
        ],
        Commands::CHECK_ELEMENT_SELECTED => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/selected',
        ],
        Commands::CHECK_ELEMENT_ENABLED => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/enabled',
        ],
        Commands::GET_ELEMENT_ATTRIBUTE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/attribute/:name',
        ],
        Commands::CHECK_ELEMENTS_EQUALS => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/equals/:other',
        ],
        Commands::CHECK_ELEMENT_DISPLAYED => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/displayed',
        ],
        Commands::GET_ELEMENT_LOCATION => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/location',
        ],
        Commands::GET_ELEMENT_SIZE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/size',
        ],
        Commands::GET_ELEMENT_COMPUTED_CSS_PROPERTY => [
            'method' => 'GET',
            'url' => '/session/:sessionId/element/:id/css/:propertyName',
        ],
        Commands::GET_BROWSER_ORIENTATION => [
            'method' => 'GET',
            'url' => '/session/:sessionId/orientation',
        ],
        Commands::SET_BROWSER_ORIENTATION => [
            'method' => 'POST',
            'url' => '/session/:sessionId/orientation',
        ],
        Commands::GET_JAVASCRIPT_ALERT_TEXT => [
            'method' => 'GET',
            'url' => '/session/:sessionId/alert_text',
        ],
        Commands::SEND_KEYSTROKES_TO_JAVASCRIPT_PROMPT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/alert_text',
        ],
        Commands::ACCEPT_JAVASCRIPT_ALERT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/accept_alert',
        ],
        Commands::DISMISS_JAVASCRIPT_ALERT => [
            'method' => 'POST',
            'url' => '/session/:sessionId/dismiss_alert',
        ],
        Commands::MOUSE_MOVE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/moveto',
        ],
        Commands::MOUSE_CLICK => [
            'method' => 'POST',
            'url' => '/session/:sessionId/click',
        ],
        Commands::MOUSE_CLICK_AND_HOLD => [
            'method' => 'POST',
            'url' => '/session/:sessionId/buttondown',
        ],
        Commands::MOUSE_RELEASE_BUTTON => [
            'method' => 'POST',
            'url' => '/session/:sessionId/buttonup',
        ],
        Commands::MOUSE_DOUBLE_CLICK => [
            'method' => 'POST',
            'url' => '/session/:sessionId/doubleclick',
        ],
        Commands::TOUCH_SINGLE_TAP => [
            'method' => 'POST',
            'url' => '/session/:sessionId/touch/click',
        ],
        Commands::TOUCH_MOVE_DOWN => [
            'method' => 'POST',
            'url' => '/session/:sessionId/touch/down',
        ],
        Commands::TOUCH_MOVE_UP=> [
            'method' => 'POST',
            'url' => '/session/:sessionId/touch/up',
        ],
        Commands::TOUCH_SCROLL => [
            'method' => 'POST',
            'url' => '/session/:sessionId/touch/scroll',
        ],
        Commands::TOUCH_DOUBLE_TAP => [
            'method' => 'POST',
            'url' => 'session/:sessionId/touch/doubleclick',
        ],
        Commands::TOUCH_LONG_TAP => [
            'method' => 'POST',
            'url' => 'session/:sessionId/touch/longclick',
        ],
        Commands::TOUCH_FLICK => [
            'method' => 'POST',
            'url' => 'session/:sessionId/touch/flick',
        ],
        Commands::GET_CURRENT_GEO_LOCATION => [
            'method' => 'GET',
            'url' => '/session/:sessionId/location',
        ],
        Commands::SET_CURRENT_GEO_LOCATION => [
            'method' => 'POST',
            'url' => '/session/:sessionId/location',
        ],
        Commands::LOCAL_STORAGE_GET_ALL_KEYS => [
            'method' => 'GET',
            'url' => '/session/:sessionId/local_storage',
        ],
        Commands::LOCAL_STORAGE_SET_KEY => [
            'method' => 'POST',
            'url' => '/session/:sessionId/local_storage',
        ],
        Commands::LOCAL_STORAGE_CLEAR => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/local_storage',
        ],
        Commands::LOCAL_STORAGE_GET_ITEM => [
            'method' => 'GET',
            'url' => '	/session/:sessionId/local_storage/key/:key',
        ],
        Commands::LOCAL_STORAGE_REMOVE_ITEM => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/local_storage/key/:key',
        ],
        Commands::LOCAL_STORAGE_GET_SIZE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/local_storage/size',
        ],
        Commands::SESSION_STORAGE_GET_ALL_KEYS => [
            'method' => 'GET',
            'url' => '/session/:sessionId/session_storage',
        ],
        Commands::SESSION_STORAGE_SET_KEY => [
            'method' => 'POST',
            'url' => '/session/:sessionId/session_storage',
        ],
        Commands::SESSION_STORAGE_CLEAR => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/session_storage',
        ],
        Commands::SESSION_STORAGE_GET_ITEM => [
            'method' => 'GET',
            'url' => '	/session/:sessionId/session_storage/key/:key',
        ],
        Commands::SESSION_STORAGE_REMOVE_ITEM => [
            'method' => 'DELETE',
            'url' => '/session/:sessionId/session_storage/key/:key',
        ],
        Commands::SESSION_STORAGE_GET_SIZE => [
            'method' => 'GET',
            'url' => '/session/:sessionId/session_storage/size',
        ],
        Commands::GET_LOG_BY_TYPE => [
            'method' => 'POST',
            'url' => '/session/:sessionId/log',
        ],
        Commands::GET_AVAILABLE_LOG_TYPES => [
            'method' => 'GET',
            'url' => '/session/:sessionId/log/types',
        ],
        Commands::GET_APPLICATION_CACHE_STATUS => [
            'method' => 'GET',
            'url' => '/session/:sessionId/application_cache/status',
        ],
    ];

    /**
     * @inheritdoc
     */
    public function createCommand(string $forCommand, array $additionalParameters = []): HttpCommand
    {
        if (!array_key_exists($forCommand, $this->mapping)) {
            throw new MissingUrlMappingException(
                sprintf('The %s command not mapped by this class!', $forCommand)
            );
        }

        $commandDetails = $this->mapping[$forCommand];
        $parameters = array_merge($additionalParameters, $this->arguments);

        return new HttpCommand($commandDetails, $parameters);
    }

}
