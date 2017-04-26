<?php
namespace Extension\Templavoila\Messaging;


/**
 * A class which collects and renders flash messages.
 */
class FlashMessageQueue extends \TYPO3\CMS\Core\Messaging\FlashMessageQueue
{
 
    /**
     * Fetches and renders all available flash messages from the queue.
     *
     * @return string All flash messages in the queue rendered as HTML.
     */
    public function renderFlashMessages()
    {
        $content = '';
        $flashMessages = $this->getAllMessagesAndFlush();
        if (!empty($flashMessages)) {
            $content = '<ul class="typo3-messages">';
            foreach ($flashMessages as $flashMessage) {
                $severityClass = sprintf('alert %s', $flashMessage->getClass());
                $messageContent = $flashMessage->getMessage();
                if ($flashMessage->getTitle() !== '') {
                    $messageContent = sprintf('<h4>%s</h4>', $flashMessage->getTitle()) . $messageContent;
                }
                $content .= sprintf('<li class="%s">%s</li>', htmlspecialchars($severityClass), $messageContent);
            }
            $content .= '</ul>';
        }
        return $content;
    }

}
