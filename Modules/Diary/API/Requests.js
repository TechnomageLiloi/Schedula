Schedula.Diary = {
    Road: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Schedula.Diary.Road.Create', {}, function (data) {
                Schedula.Diary.Road.search();
            }, function () {

            });
        },

        show: function () {
            API.request('Schedula.Diary.Road.Show', {}, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (keyDay) {
            API.request('Schedula.Diary.Road.Edit', {
                key_day: keyDay
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (keyDay) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Schedula.Diary.Road.Save', {
                key_day: keyDay,
                data: jq_block.find('[name=data]').val(),
                program: jq_block.find('[name=program]').val()
            }, function (data) {
                Schedula.Diary.Road.show();
            }, function () {

            });
        }
    },

    Jobs: {
        create: function (key_day, key_hour, key_quarter) {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Schedula.Diary.Jobs.Create', {
                key_day: key_day,
                key_hour: key_hour,
                key_quarter: key_quarter
            }, function (data) {
                Schedula.Diary.Road.show();
            }, function () {

            });
        },

        edit: function (key_day, key_hour, key_quarter) {
            API.request('Schedula.Diary.Jobs.Edit', {
                key_day: key_day,
                key_hour: key_hour,
                key_quarter: key_quarter
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_day, key_hour, key_quarter) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Schedula.Diary.Jobs.Save', {
                key_day: key_day,
                key_hour: key_hour,
                key_quarter: key_quarter,
                title: jq_block.find('[name=title]').val(),
                status: jq_block.find('[name=status]').val(),
                karma: jq_block.find('[name=karma]').val()
            }, function (data) {
                Schedula.Diary.Road.show();
            }, function () {

            });
        }
    }
}