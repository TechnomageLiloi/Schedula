Schedula.Levels.Quest = {
    create: function () {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Schedula.Levels.Quest.Create', {}, function (data) {
            Schedula.Levels.Quest.show(1);
        }, function () {

        });
    },

    show: function (status) {
        API.request('Schedula.Levels.Quest.Show', {
            status: status
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_quest) {
        API.request('Schedula.Levels.Quest.Edit', {
            key_quest: key_quest
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_quest) {
        if (!confirm('Are you sure?')) {
            return;
        }

        const jq_block = $('#application-Quests-edit');
        let status = jq_block.find('[name=status]').val();
        API.request('Schedula.Levels.Quest.Save', {
            key_quest: key_quest,
            data: jq_block.find('[name=data]').val(),
            key_level: jq_block.find('[name=key_level]').val(),
            xp: jq_block.find('[name=xp]').val(),
            status: status,
            summary: jq_block.find('[name=summary]').val()
        }, function (data) {
            Schedula.Levels.Quest.show(status);
        }, function () {

        });
    },

    update: function (key_quest, status) {
        var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
            + (currentdate.getMonth()+1)  + "-"
            + currentdate.getDate() + " "
            + currentdate.getHours() + ":"
            + currentdate.getMinutes() + ":"
            + currentdate.getSeconds();

        const jq_block = $('#application-Quests-edit');
        API.request('Schedula.Levels.Quest.Save', {
            key_quest: key_quest,
            dt: datetime
        }, function (data) {
            Schedula.Levels.Quest.show(status);
        }, function () {

        });
    }
};

Schedula.Levels.Tickets = {
    create: function (key_quest) {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Schedula.Levels.Tickets.Create', {
            key_quest: key_quest
        }, function (data) {
            Schedula.Levels.Quest.show(1);
        }, function () {

        });
    },

    edit: function (key_ticket, key_quest) {
        API.request('Schedula.Levels.Tickets.Edit', {
            key_ticket: key_ticket,
            key_quest: key_quest
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_ticket, key_quest, status) {
        if (!confirm('Are you sure?')) {
            return;
        }

        const jq_block = $('#application-Quests-edit');
        API.request('Schedula.Levels.Tickets.Save', {
            key_ticket: key_ticket,
            key_quest: key_quest,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val()
        }, function (data) {
            Schedula.Levels.Quest.show(status);
        }, function () {

        });
    }
};
