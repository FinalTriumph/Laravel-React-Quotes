import React, { useState, useEffect } from 'react';
import axios from 'axios';

// TODO This should be split into multiple components
export default function NewQuote({ save }) {
    const [quote, setQuote] = useState(null);
    const [author, setAuthor] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [savingStatus, setSavingStatus] = useState(null);

    function getNewQuote() {
        setQuote(null);
        setAuthor(null);
        setLoading(true);
        setError(null);
        setSavingStatus(null);

        axios.get('https://laravel-react-quotes.dev/api/quotes/random?source=zen')
            .then(response => {
                setQuote(response.data.data.quote);
                setAuthor(response.data.data.author);

                setLoading(false);
            })
            .catch(error => {
                console.error(error);
                setError('Error occurred while fetching quote');

                setLoading(false);
            });
    }

    function saveQuote() {
        setSavingStatus('saving');

        axios.post('https://laravel-react-quotes.dev/api/quotes', { quote, author })
            .then(response => {
                console.log(response.data);
                setSavingStatus(response.data.status || 'error');
            }).catch(error => {
                console.error(error.message);
                setSavingStatus('error');
            });
    }

    useEffect(() => {
        getNewQuote();
    }, []);

    function saveOption() {
        if (!save) {
            return (null);
        }

        if (!savingStatus) {
            return (
                <button
                    className="btn-action w-full"
                    onClick={saveQuote}
                >
                    Save
                </button>
            )
        }

        if (savingStatus === 'error') {
            return (
                <div>
                    <div className="text-center mt-8 mb-4">
                        <p className="text-red-500">Error occurred while saving quote</p>
                    </div>
                    <button
                        className="btn-action w-full"
                        onClick={saveQuote}
                    >
                        Save
                    </button>
                </div>
            )
        }

        if (savingStatus === 'saving') {
            return (
                <div className="text-center mt-8 mb-4">
                    <p>Saving ...</p>
                </div>
            )
        }

        return (
            <div className="text-center mt-8 mb-4">
                <p className="font-bold">Quote saved!</p>
            </div>
        )
    }

    return (
        <div className="max-w-sm bg-slate-100 text-slate-800 p-6 mx-auto mb-6 rounded-md">
            {quote && author && (
                <div>
                    <div className="mb-6">
                        <p className="font-bold">{quote}</p>
                        <p>- {author}</p>
                    </div>
                    {saveOption()}
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
