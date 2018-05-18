<?php

namespace Drupal\calendar\Plugin\Block;

use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Calendar block for custom module
 *
 * @Block(
 *   id = "calendar_block",
 *   admin_label = @Translation("Calendar"),
 *   category = @Translation("Custom calendar"),
 * )
 *
 * @return array|void
 */
class CalendarBlock extends BlockBase implements BlockPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $config = $this->getConfiguration();

        if (!empty($config['hello_block_name'])) {
            $name = $config['hello_block_name'];
        }
        else {
            $name = $this->t('to no one');
        }
        return array(
            '#markup' => $this->t('Hello @name!', array(
                '@name' => $name,
            )),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration() {
        $default_config = \Drupal::config('calendar_block.settings');
        return [
            'hello_block_name' => $default_config->get('hello.name'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();

        $form['hello_block_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Who'),
            '#description' => $this->t('Who do you want to say hello to?'),
            '#default_value' => isset($config['hello_block_name']) ? $config['hello_block_name'] : '',
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        parent::blockSubmit($form, $form_state);
        $values = $form_state->getValues();
        $this->configuration['hello_block_name'] = $values['hello_block_name'];
    }

}

