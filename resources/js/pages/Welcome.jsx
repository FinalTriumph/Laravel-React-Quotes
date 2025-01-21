import React, { useState, useEffect } from 'react';
import axios from 'axios';

function Welcome() {
    const [quote, setQuote] = useState(null);
    const [author, setAuthor] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    function newQuote() {
        setQuote(null);
        setAuthor(null);
        setLoading(true);
        setError(null);

        axios.get('https://programming-quotes-api.azurewebsites.net/api/quotes/random')
            .then(response => {
                setQuote(response.data.text);
                setAuthor(response.data.author);

                setLoading(false);
            })
            .catch(error => {
                console.error(error);
                setError('Error occurred while fetching quote');

                setLoading(false);
            });
    }

    useEffect(() => {
        newQuote();
    }, []);

    return (
        <div className="max-w-sm bg-slate-100 text-slate-800 p-6 rounded-md">
            {quote && author && (
                <div>
                    <p className="font-bold">{quote}</p>
                    <p>- {author}</p>
                </div>
            )}
            {error && (
                <p className="text-red-500">{error}</p>
            )}
            {loading ? (
                <div>Loading ...</div>
            ) : (
                <button
                    className="btn-action w-full mt-6"
                    onClick={newQuote}
                >
                    New Quote
                </button>
            )}
        </div>
    );
}

export default Welcome;