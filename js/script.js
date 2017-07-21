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
                var row = $('<tr>');
                row.append($('<td>').text(
                    movie['title']).append(
                    !movie['title_alt'].empty()
                        ? $('<span>').addClass('titleAlt').text(movie['title_alt'])
                        : ''
                ));
                row.append($('<td>').text(formatMovieDuration(movie['duration'])));
                row.append($('<td>').text(movie['release_year']));
                row.append($('<td>').text(movie['width'] + ' x ' + movie['height']));
                row.append($('<td>').text(formatMovieSize(movie['size'])));
                row.append($('<td>').append(
                    $('<input>')
                        .attr('type', 'button')
                        .val('Play')
                        .attr('disabled', !movie['playable']))
                );
                movies_table.append(row);
            });
        }).fail(function (response, code) {
            console.error('Failed to load movie list!');
        });
    });
})();
