/**
 * @version		$Id$
 * @package		JXtended.Comments
 * @subpackage	com_comments
 * @copyright	Copyright (C) 2008 - 2009 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://jxtended.com
 */

/**
 * JXtended Ratings behavior class for Comments.
 *
 * @package		JXtended.Comments
 * @subpackage	JavaScript
 * @version		1.1
 */
var JXRatings = new Class({

	/**
	 * Method to decorate the rating forms with the ratings behavior.
	 *
	 * @return	void
	 * @since	1.1
	 */
	decorate: function(forms)
	{
		// Decorate the forms.
		forms.each(function(form)
		{
			// Get the star links.
			var links = form.getElements('ul.rating-stars a');

			links.each(function(link)
			{
				// Tie the link to the parent form.
				link.setProperty('form', form.getProperty('id'));

				// Set the cursor style.
				link.setStyle('cursor', 'pointer');

				// Attach the onClick behavior.
				link.addEvent('click', function(e)
				{
					// Stop the click event.
					e = new Event(e).stop();

					// Get the parent form.
					var form	= $(e.target.getProperty('form'));
					var	context	= form.getProperty('id').replace('rate-', '');

					// Convert the action to a JSON request.
					var query	= 'protocol=json&tmpl=component&format=raw';
					var action	= form.getProperty('action');
					form.setProperty('action', action.contains('?') ? action+'&'+query : action+'?'+query);

					// Set the value of the rating.
					form.score.value = e.target.getProperty('rel');

					form.send({
						onComplete: function(response)
						{
							// Decode the JSON response.
							response = Json.evaluate(response);

							// Replace the page tokens.
							JX.replaceTokens(response.token);

							// Check for errors.
							if (response.error == true) {
								alert(response.message);
							}
							else
							{
								// Get the rating counter.
								var counter = $('rating-count-'+context).getElement('span.count');
								var string	= $('rating-count-'+context).getElement('span.string');

								// Adjust the rating counter.
								counter.setText(response.pscore_count);
								string.setText(response.counter_text);

								// Adjust the rating stars.
								stars = form.getElement('.current-rating');
								stars.setStyle('width', Math.floor(response.pscore * 100) + '%');
							}
						},

						onFailure: function(response)
						{
							// Decode the JSON response.
							response = Json.evaluate(response.responseText);

							// Replace the request validation tokens.
							JX.replaceTokens(response.token);

							// Alert the user about the error.
							alert(response.message);
						}
					});
				});
			});
		});
	}
});

window.addEvent('domready', function()
{
	JX.Ratings = new JXRatings();
	JX.Ratings.decorate($$('form.addrating'));
});