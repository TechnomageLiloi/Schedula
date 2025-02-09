Schedula.Quest = {
    Problems: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Schedula.Quests.Problems.Create', {

            }, function (data) {
                Schedula.Diary.Road.show();
            }, function () {

            });
        },

        edit: function (key_problem) {
            API.request('Schedula.Quests.Problems.Edit', {
                key_problem: key_problem
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_problem) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Schedula.Quests.Problems.Save', {
                key_problem: key_problem,
                title: jq_block.find('[name=title]').val(),
                status: jq_block.find('[name=status]').val(),
                program: jq_block.find('[name=program]').val(),
                data: jq_block.find('[name=data]').val()
            }, function (data) {
                Schedula.Diary.Road.show();
            }, function () {

            });
        }
    }
};
