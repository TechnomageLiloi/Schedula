Schedula.Quests.Quest = {
    create: function () {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Schedula.Quests.Quest.Create', {}, function (data) {
            Schedula.Quests.Quest.show(1);
        }, function () {

        });
    },

    show: function (status) {
        API.request('Schedula.Quests.Quest.Show', {
            status: status
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_quest) {
        API.request('Schedula.Quests.Quest.Edit', {
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
        API.request('Schedula.Quests.Quest.Save', {
            key_quest: key_quest,
            data: jq_block.find('[name=data]').val(),
            key_level: jq_block.find('[name=key_level]').val(),
            xp: jq_block.find('[name=xp]').val(),
            status: status,
            summary: jq_block.find('[name=summary]').val()
        }, function (data) {
            Schedula.Quests.Quest.show(status);
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
        API.request('Schedula.Quests.Quest.Save', {
            key_quest: key_quest,
            dt: datetime
        }, function (data) {
            Schedula.Quests.Quest.show(status);
        }, function () {

        });
    }
};

Schedula.Quests.Tickets = {
    create: function (key_quest) {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Schedula.Quests.Tickets.Create', {
            key_quest: key_quest
        }, function (data) {
            Schedula.Quests.Quest.show(1);
        }, function () {

        });
    },

    edit: function (key_ticket, key_quest) {
        API.request('Schedula.Quests.Tickets.Edit', {
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
        API.request('Schedula.Quests.Tickets.Save', {
            key_ticket: key_ticket,
            key_quest: key_quest,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val()
        }, function (data) {
            Schedula.Quests.Quest.show(status);
        }, function () {

        });
    }
};
