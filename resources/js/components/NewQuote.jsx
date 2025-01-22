import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function NewQuote({ save }) {
    const [quote, setQuote] = useState(null);
    const [author, setAuthor] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    function getNewQuote() {
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

    function saveQuote() {
        axios.post('https://laravel-react-quotes.dev/api/test', { quote, author })
            .then(response => {
                console.log(response.data);
            }).catch(error => {
                console.error(error.message);
            });
    }

    useEffect(() => {
        getNewQuote();
    }, []);

    return (
        <div className="max-w-sm bg-slate-100 text-slate-800 p-6 rounded-md">
            {quote && author && (
                <div>
                    <div className="mb-6">
                        <p className="font-bold">{quote}</p>
                        <p>- {author}</p>
                    </div>
                    {save && (
                        <button
                            className="btn-action w-full"
                            onClick={saveQuote}
                        >
                            Save
                        </button>
                    )}
                    <button
                        className="btn-action w-full"
                        onClick={getNewQuote}
                    >
                        New Quote
                    </button>
                </div>
            )}
            {error && (
                <p className="text-red-500">{error}</p>
            )}
            {loading && (
                <div>Loading ...</div>
            )}
        </div>
    );
}
