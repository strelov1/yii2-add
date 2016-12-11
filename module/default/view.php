<?php
/* @var $generator yii\gii\generators\module\Generator */
?>
{% extends "@<?= $generator->name; ?>/views/layouts/base.twig" %}

{% block content %}
<div class="<?= $generator->name . '-default-index' ?>">
    <h1>{{ this.context.action.uniqueId }}</h1>
    <p>
        This is the view content for action "{{ this.context.action.id }}".
        The action belongs to the controller
        in the "{{ this.context.module.id }}" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code>{{ app.name }}</code>
    </p>
</div>
{% endblock %}