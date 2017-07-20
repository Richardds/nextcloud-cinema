(function () {
    Number.prototype.round = function (precision) {
        var x = Math.pow(10, precision);
        return Math.round(this * x) / x;
    };

    String.prototype.empty = function () {
        return !this.trim();
    };
    
    function formatMovieDuration(duration) {
        var hour = 3600;

        if (duration < hour) {
            return (duration / 60) + ' minutes';
        }

        return Math.floor(duration / hour) + ' hr. ' + Math.floor(duration % hour / 60) + ' min.';
    }

    function formatMovieSize(size) {
        var megabyte = Math.pow(1024, 2);
        var gigabyte = Math.pow(1024, 3);

        if (size < gigabyte) {
            return Math.floor(size / megabyte) + ' MB';
        }

        return (size / gigabyte).round(2) + ' GB';
    }

    $(document).ready(function () {
        var baseUrl = OC.generateUrl('/apps/cinema');
        var movies_table = $('#movies tbody');

        $.get(baseUrl + '/movies').done(function (response) {
            $.each(response, function (i, movie) {
                movies_table.append(
                    '<tr>' +
                    '<td>' + movie['title'] + (!movie['title_alt'].empty() ? '<span class="titleAlt">' + movie['title_alt'] + '</span>' : '') + '</td>' +
                    '<td>' + formatMovieDuration(movie['duration']) + '</td>' +
                    '<td>' + movie['release_year'] + '</td>' +
                    '<td>' + movie['width'] + ' x ' + movie['height'] + '</td>' +
                    '<td>' + formatMovieSize(movie['size']) + '</td>' +
                    '<td><input type="button" value="Play"' + (!movie['playable'] ? ' disabled' : '') + '></td>' +
                    '</tr>'
                );
            });
        }).fail(function (response, code) {
            console.error('Failed to load movie list!');
        });
    });
})();
