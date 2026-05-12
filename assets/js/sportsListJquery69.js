/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {

    Array.prototype.unique = function () {
        return this.filter(function (value, index, self) {
            return self.indexOf(value) === index;
        });
    }

    $(document).ready(function () {
        

        
        

        $(document).on('click', '.collapseBtnMatchTitle', function () {

            if (!$(this).hasClass('bg-secondary')) {
                var match_id = $(this).attr('id').split('-')[2], is_shown = true, show_hide = 'show', collapsable_elm = 'match-data-' + match_id;

                if ($('#' + collapsable_elm).hasClass('show')) {
                    is_shown = false;
                }

                if (!is_shown) {
                    show_hide = 'hide';
                }
                
                $('#' + collapsable_elm).collapse(show_hide);

                $('#' + collapsable_elm).on('shown.bs.collapse', function () {
                    Cookies.set('expanded_match', collapsable_elm);
                });

                $('#' + collapsable_elm).on('hidden.bs.collapse', function () {
                    Cookies.remove('expanded_match');
                });
            }
        });

        var opened_questions = [], match_ids = [];
        $(document).on('click', '.collapseBtnAnswers', function () {
            var is_shown = true, show_hide = 'show', question_id = $(this).attr('id').split('-')[2], collapsable_elm = 'question-data-' + question_id
                    , match_id = $(this).attr('data-match-id');

            if ($('#' + collapsable_elm).hasClass('show')) {
                is_shown = false;
            }

            if (!is_shown) {
                show_hide = 'hide';
            } else {
                opened_questions.push(collapsable_elm);
            }

            $('#' + collapsable_elm).collapse(show_hide);

            $('#' + collapsable_elm).on('shown.bs.collapse', function () {
                Cookies.set('expanded_question', JSON.stringify(opened_questions.unique()));
            });

            $('#' + collapsable_elm).on('hidden.bs.collapse', function () {
                resetQuestionCookie(collapsable_elm, match_id);
            });


        });

        $(document).on('click', '.collapseBtn', function () {
            var is_shown = true, show_hide = 'show', font_class = 'text-yellow', text_decoration = 'underline';

            if ($(this).parent('div').find('.collapseBody').hasClass('show')) {
                is_shown = false;
            }

            if (!is_shown) {
                show_hide = 'hide';
                font_class = 'text-gray';
                text_decoration = 'none';
            }

            $(this).find('h5 button').removeClass('text-gray');
            $(this).find('h5 button').removeClass('text-yellow');
            $(this).find('h5 button').addClass(font_class);
            $(this).find('h5 button').css('text-decoration', text_decoration);

            $(this).parent('div').find('.collapseBody').collapse(show_hide);
        });

    });

    var opened_questions_ar = [], match_ids = [];
    function resetQuestionCookie(elm, match_id) {
        var str_expanded_questions = Cookies.get('expanded_question');
        if (str_expanded_questions != undefined) {
            opened_questions_ar = JSON.parse(str_expanded_questions);
        }

        if (opened_questions_ar.length > 0) {
            var idx = opened_questions_ar.indexOf(elm);
            if (idx > -1) {
                opened_questions_ar.splice(idx, 1);
            }
        }

//        if (match_questions.length == 1) {
//            match_questions = [];
//        }

        Cookies.set('expanded_question', JSON.stringify(opened_questions_ar));
        return true;
    }

})(jQuery);